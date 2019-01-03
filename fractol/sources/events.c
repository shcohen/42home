/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   events.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:15:20 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/03 23:35:49 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

void	ft_keycode(int key, t_all *all)
{
	if (key == 67)
		all->mlx.max_iter += 0.2;
	else if (key == 75)
		all->mlx.max_iter -= 0.2;
	else if (key == 126)
		all->fra.mx -= 0.1;
	else if (key == 125)
		all->fra.mx += 0.1;
	else if (key == 123)
		all->fra.my -= 0.1;
	else if (key == 124)
		all->fra.my += 0.1;
	ft_key(key, all);
}

int		ft_key(int key, t_all *all)
{
	if (key == 53)
		exit(0);
	mlx_put_image_to_window(all->mlx.mlx_ptr, all->mlx.win_ptr,
		all->mlx.img_ptr, 0, 0);
	ft_array(all);
	return (0);
}