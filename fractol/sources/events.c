/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   events.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:15:20 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/04 22:13:00 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

int		ft_motion_hook(int x, int y, t_all *all)
{
	if (x < all->mlx.x_size && y < all->mlx.y_size && all->key.mouse == 1)
	{
		all->fra.c_r = (x < all->mlx.x_size / 2) ? (all->fra.c_r + 0.01) :
		(all->fra.c_r - 0.01);
		all->fra.c_i = (y < all->mlx.y_size / 2) ? (all->fra.c_i + 0.01) :
		(all->fra.c_i - 0.01);
		ft_redraw(all);
	}
	return (0);
}

int		ft_mousehook(int button, int x, int y, t_all *all)
{
	if ((button == LEFT_CLICK && all->key.click == 1) || button == MOUSE_UP)
	{
		all->key.zoom *= 1.1;
		all->fra.x1 = all->fra.x1 + ((double)x - ((double)all->mlx.x_size / 2))
			/ all->key.zoom;
		all->fra.y1 = all->fra.y1 + ((double)y - ((double)all->mlx.y_size / 2))
			/ all->key.zoom;
	}
	if ((button == RIGHT_CLICK && all->key.click == 1) || button == MOUSE_DOWN)
	{
		all->key.zoom *= 1.1;
		all->fra.x1 = all->fra.x1 + ((double)x - ((double)all->mlx.x_size / 2))
			/ all->key.zoom;
		all->fra.y1 = all->fra.y1 + ((double)y - ((double)all->mlx.y_size / 2))
			/ all->key.zoom;
	}
	ft_redraw(all);
	return (0);
}

void	ft_init_keycode(t_all *all)
{
	all->fra.mx = 0;
	all->fra.my = 0;
	all->key.zoom = 200;
	all->key.color_bonus = 0;
	all->key.px = 0;
	all->key.py = 0;
}

void	ft_keycode(int key, t_all *all)
{
	if (key == 67)
		all->fra.max_iter += 0.2;
	else if (key == 75)
		all->fra.max_iter -= 0.2;
	else if (key == 126)
		all->fra.mx -= 0.1;
	else if (key == 125)
		all->fra.mx += 0.1;
	else if (key == 123)
		all->fra.my -= 0.1;
	else if (key == 124)
		all->fra.my += 0.1;
	ft_redraw(all);
}

int		ft_key(int key, t_all *all)
{
	if (key == 53)
		exit(0);
	if (key == 15)
	{
		ft_init_keycode(all);
		ft_init_fractal(all);
	}
	ft_keycode(key, all);
	ft_bzero(all->mlx.img_str, all->mlx.x_size * all->mlx.y_size * sizeof(int));
	mlx_put_image_to_window(all->mlx.mlx_ptr, all->mlx.win_ptr,
	all->mlx.img_ptr, 0, 0);
	ft_array(all);
	return (0);
}