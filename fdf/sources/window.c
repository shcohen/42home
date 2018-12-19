/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/19 20:36:14 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int		ft_create_window(t_all *all)
{
	int	bpp;
	int	s_l;
	int	endian;

	all->win.height = 1080;
	all->win.width = 1920;
	all->win.ex = all->win.width / (all->map.width + all->map.height)
		/ 2 * 1.732; // isometric projection
	all->win.ey = all->win.width / (all->map.width + all->map.height) / 2;
	all->win.ez = all->win.width / (all->map.height + all->map.width) / 5;
	all->win.mlx_ptr = mlx_init();
	all->win.win_ptr = mlx_new_window(all->win.mlx_ptr, all->win.width,
	all->win.height, "fdf");
	all->win.img_ptr = mlx_new_image(all->win.mlx_ptr, all->win.width,
	all->win.height);
	all->win.img_str = (int *)mlx_get_data_addr(all->win.img_ptr,
	&bpp, &s_l, &endian);
	ft_bzero(all->win.img_str, all->win.height * all->win.width * sizeof(int));
	ft_iso(all);
	all->win.proj = 'i';
	mlx_put_image_to_window(all->win.mlx_ptr, all->win.win_ptr,
	all->win.img_ptr, 0, 0);
	return (0);
}
